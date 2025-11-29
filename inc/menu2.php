<div class="nav-home">
    <div class="container">
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <ul class="list-group menu-set">
                    <li class="list-group-item menu-item"><a href="/">Acasa</a></li>
                    <li class="list-group-item menu-item"><a href="despre-pizzamyway">Despre noi</a></li>
					<li class="list-group-item menu-item"><a href="pizza-craiova">Pizza</a></li>
                    <li class="list-group-item menu-item"><a href="catering-myway-craiova">Catering</a></li>
                    <li class="list-group-item menu-item"><a href="contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-xs-3"></div>
        </div>
    </div>
</div>

<nav>
<a id="expand-menu" href="#"></a>
<a id="close-menu" href="#"><i class="fa fa-times"></i></a>
<a href="/" class="logo-img"><img src="assets/images/logo-pizza-myway.png" alt="Logo Pizza MyWay"/></a>
 <div class="phone-right2 pull-right">
        <h4 class="comenzi visible-lg">Comenzi</h4>
        <a class="" href="#">0351.176.968</a>
        <a class="" href="#">0741.588.985</a><br class="visible-lg">
        <a class="" href="#">0760.282.820</a><br/>
        <div style="padding-top: 6px; <?php
$homepage = "/pizzamyway/";
$currentpage = $_SERVER['REQUEST_URI'];
if($homepage!=$currentpage) {
echo "display:none !important";
}
?>" class="col-md-5 visible-xs">
            <p style="font-size: 15px;font-weight: 300;">Descarca gratuit aplicatia noastra</p>
        </div>

        <div <?php
if($homepage!=$currentpage) {
echo "style='display:none !important;'";
}
?> class="col-md-7 visible-xs">
            <a style="padding-right: 0px;" target="_blank" href="https://play.google.com/store/apps/details?id=com.pt.fastfood"><img src="assets/images/app/android.png" alt=""/></a>
            <a style="padding-right: 0px;" target="_blank" href="https://itunes.apple.com/bm/app/pizzamyway.ro/id1078924632?mt=8"><img src="assets/images/app/iphone.png" alt=""/></a>
        </div>
    </div>
</nav>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
