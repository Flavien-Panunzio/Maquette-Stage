<?php
	$requete=('SELECT * FROM login');
	$requete=requeteWHERE($requete);
	$Nom=$requete[0]->Nom;
	$Prenom=$requete[0]->Prenom;
	$Photo=$requete[0]->Photo;
?>
<head>
	<title>Interface D'administration</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="icon" href="../uploads/favicon-lock.ico" />


	<!-- CSS-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/style/defaultadmin/css/main.css">

	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>
<body class="app sidebar-mini rtl">
 <!-- Navbar-->
 <header class="app-header"><a class="app-header__logo" href="/page/admin">Lorem sur Allier</a>
	<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
		<!--Notification Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
		 <ul class="app-notification dropdown-menu dropdown-menu-right">
			<li class="app-notification__title">You have 4 new notifications.</li>
			<div class="app-notification__content">
				<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
					<div>
						<p class="app-notification__message">Lisa sent you a mail</p>
						<p class="app-notification__meta">2 min ago</p>
					</div></a></li>
				<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
					<div>
						<p class="app-notification__message">Mail server not working</p>
						<p class="app-notification__meta">5 min ago</p>
					</div></a></li>
				<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
					<div>
						<p class="app-notification__message">Transaction complete</p>
						<p class="app-notification__meta">2 days ago</p>
					</div></a></li>
			</div>
			<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
		 </ul>
		</li>
		<!-- User Menu-->
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
		 <ul class="dropdown-menu settings-menu dropdown-menu-right">
			<li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i>Paramètres</a></li>
			<li><a class="dropdown-item" href="/page/admin/Pages/user.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
			<li><a class="dropdown-item" href="Module/logout.php"><i class="fa fa-sign-out fa-lg"></i>Déconnexion</a></li>
		 </ul>
		</li>
	</ul>
 </header>
 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
	<a href="/page/admin/Pages/user.php"><div class="app-sidebar__user"><img class="app-sidebar__user-avatar user-img" src="<?=$Photo?>" alt="User Image" height="48px" width="48px">
		<div>
		 <p class="app-sidebar__user-name"><?=$Prenom?> <?=$Nom?></p>
		 <p class="app-sidebar__user-designation">Frontend Developer</p>
		</div>
	</div></a>
	<ul class="app-menu">
		<li><a class="app-menu__item" href="/page/admin/"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de bord</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Articles.php"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Mes Articles</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Analytics.php"><i class="app-menu__icon fa fa-area-chart"></i><span class="app-menu__label">Google Analytics</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Calendrier.php"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Calendrier</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Medias.php"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Mes médias</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Messagerie.php"><i class="app-menu__icon fa fa-envelope-open"></i><span class="app-menu__label">Messagerie</span></a></li>
		<li><a class="app-menu__item" href="/page/admin/Pages/Blank.php"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Blank</span></a>
		</li>
	</ul>
 </aside>