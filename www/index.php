<?php 
	require_once("header.php");
	require_once("connexion.php");
?>

	<!-- 
      The nav bar that will be updated as we navigate between views.
    -->
    <ion-nav-bar class="bar-stable nav-title-slide-ios7">
      <ion-nav-back-button class="button-icon icon ion-chevron-left">
        Back
      </ion-nav-back-button>
    </ion-nav-bar>
    <!-- 
      The views will be rendered in the <ion-nav-view> directive below
      Templates are in the /templates folder (but you could also
      have templates inline in this html file if you'd like).
    -->
    <ion-nav-view></ion-nav-view>

<?php require_once("footer.php"); ?>