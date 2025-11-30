import re
import sqlite3
import os

def parse_sql_and_insert(sql_file, db_file):
    conn = sqlite3.connect(db_file)
    cursor = conn.cursor()

    # Create table if not exists (although app.py handles it, good to double check or create here)
    cursor.execute('''
    CREATE TABLE IF NOT EXISTS produse (
        id INTEGER PRIMARY KEY,
        categorie TEXT NOT NULL,
        titlu TEXT NOT NULL,
        descriere TEXT NOT NULL,
        gr TEXT NOT NULL,
        pret REAL NOT NULL,
        poza TEXT NOT NULL
    )
    ''')

    with open(sql_file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Find the INSERT INTO statement
    # The format in the file is: INSERT INTO `produse` (`id`, `categorie`, `titlu`, `descriere`, `gr`, `pret`, `poza`) VALUES
    # (1, 'salata', ...),
    # ...

    # Let's extract everything after VALUES
    match = re.search(r"INSERT INTO `produse` .*? VALUES\s*(.*);", content, re.DOTALL)
    if match:
        values_block = match.group(1)
        # Split by "),\n" or ")," but be careful about text containing )
        # A robust way requires a parser, but maybe simple splitting works if text is escaped

        # Or simpler: use regex to match each tuple
        # (\d+, '.*?', '.*?', '.*?', '.*?', [\d\.]+, '.*?')
        # Wait, description can contain newlines and quotes.

        # Since this is a one-off migration, I will use a simple state machine or existing parser if available.
        # But let's try regex first. The values seem to be single-quoted strings.

        # Regex to match one row: \(([^)]+)\)
        # But description can contain )

        # Let's look at the data again.
        # (1, 'salata', 'Salata Italiana', 'ton, rosii, castraveti, masline, salata verde, branza, maioneza, ou', '635', 29, 'salata-italiana.png')

        # I'll just execute the SQL statements directly if possible.
        # But the syntax `produse` is MySQL specific (backticks). SQLite supports it but...
        # Also engine=MyISAM etc.
        # So I'll strip the create table part and just run the insert?

        # Let's try to just run the INSERT statement on SQLite.
        # SQLite usually accepts MySQL insert syntax.

        insert_statement = match.group(0)
        # Replace backticks with nothing or quotes? SQLite allows backticks for identifiers.

        try:
            cursor.execute(insert_statement)
            print("Inserted data successfully.")
        except sqlite3.Error as e:
            print(f"Error inserting data directly: {e}")
            print("Falling back to manual parsing.")

            # Fallback: Parse manually
            # Split by "),"
            rows = values_block.split("),\n")
            for row in rows:
                row = row.strip()
                if row.endswith(")"):
                    # This handles the last one
                    pass
                else:
                    row += ")" # Add back the closing parenthesis

                if row.startswith("("):
                    row = row[1:-1] # Remove outer parenthesis

                    # Now we have comma separated values, but strings are quoted.
                    # 1, 'salata', 'Title', ...

                    # We can use python's eval if we are careful, but safer to use csv parser or similar logic
                    # Or just replacement

                    # Let's construct a parameterized query
                    # This is getting complicated due to parsing SQL string literals.
                    pass

    conn.commit()
    conn.close()

if __name__ == '__main__':
    # Initialize DB first using app context
    from app import app, db
    with app.app_context():
        db.create_all()

    # Now insert data
    # Read the SQL file to extract inserts
    with open('produse.sql', 'r', encoding='latin1') as f: # The dump says latin1 charset
        sql_content = f.read()

    # Extract the values part
    match = re.search(r"INSERT INTO `produse` .*? VALUES\s*(.*);", sql_content, re.DOTALL)
    if match:
        values_str = match.group(1)
        # We need to turn this into a list of tuples to insert
        # The syntax is standard SQL.

        # Let's use a regex that captures the fields.
        # (id, 'cat', 'title', 'desc', 'gr', pret, 'img')

        # Pattern:
        # \((\d+),\s*'([^']*)',\s*'([^']*)',\s*'((?:[^']|'')*)',\s*'([^']*)',\s*([\d\.]+),\s*'([^']*)'\)

        # Note: SQL escapes single quotes as ''

        pattern = re.compile(r"\((\d+),\s*'([^']*)',\s*'([^']*)',\s*'((?:[^']|'')*)',\s*'([^']*)',\s*([\d\.]+),\s*'([^']*)'\)")

        matches = pattern.findall(values_str)
        print(f"Found {len(matches)} rows.")

        data = []
        for m in matches:
             data.append({
                 'id': int(m[0]),
                 'categorie': m[1],
                 'titlu': m[2],
                 'descriere': m[3].replace("''", "'"),
                 'gr': m[4],
                 'pret': float(m[5]),
                 'poza': m[6]
             })

        # Bulk insert
        db_path = 'instance/pizzamyway.db'
        if not os.path.exists(db_path):
             # Fallback if it was created in root
             if os.path.exists('pizzamyway.db'):
                 db_path = 'pizzamyway.db'

        conn = sqlite3.connect(db_path)
        c = conn.cursor()
        for item in data:
            try:
                c.execute("INSERT INTO produse (id, categorie, titlu, descriere, gr, pret, poza) VALUES (?, ?, ?, ?, ?, ?, ?)",
                          (item['id'], item['categorie'], item['titlu'], item['descriere'], item['gr'], item['pret'], item['poza']))
            except sqlite3.IntegrityError:
                pass # Already exists
        conn.commit()
        conn.close()
        print("Migration complete.")
    else:
        print("No INSERT statement found.")
