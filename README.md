# Pizza MyWay Flask Application

This is a Python/Flask version of the Pizza MyWay application.

## Prerequisites

*   Python 3.x
*   pip

## Installation

1.  Clone the repository.
2.  Install dependencies:
    ```bash
    pip install -r requirements.txt
    ```

## Database Migration

The application uses an SQLite database (`pizzamyway.db`). To initialize it with the original product data:

1.  Run the migration script:
    ```bash
    python migrate_db.py
    ```

## Running the Application

1.  Start the Flask server:
    ```bash
    python app.py
    ```
2.  Open your browser and navigate to `http://127.0.0.1:5000`.

## Directory Structure

*   `app.py`: Main Flask application file.
*   `templates/`: HTML templates (Jinja2).
*   `static/`: Static assets (CSS, JS, Images).
*   `instance/`: Database instance (created after running migration).
*   `migrate_db.py`: Script to populate the SQLite database from `produse.sql`.
