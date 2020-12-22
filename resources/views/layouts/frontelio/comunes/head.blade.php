        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content={{ csrf_token() }}>

        <title>@yield("contentheader_title")</title>

        <meta name="description" content="@yield('descripcion')"/>
        <meta name="keywords" content="@yield('keywords')"/>
        <meta name="author" content="Bruno Jiménez">
        <meta name="geo.region" content="ES" />
        <meta name="DC.Title" content="@yield('contentheader_title')" />
        <meta name="DC.Language" content="es" />
        <meta name="DC.Creator" content="Bruno Jiménez" />
        <meta name="google-site-verification" content="nG2hpUXdyDL_NjzC_PVq-WdbfMnDlcz_I3if5hcURhM" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="/frontelio/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontelio/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontelio/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontelio/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/frontelio/assets/ico/apple-touch-icon-57-precomposed.png">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600">    
            
        <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/frontelio/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/frontelio/assets/css/form-elements.css">
        <link rel="stylesheet" href="/frontelio/assets/css/media-queries.css">
        <link rel="stylesheet" href="/frontelio/assets/css/animate.css">
        <link rel="stylesheet" href="/frontelio/assets/css/style.css">
        <link rel="stylesheet" href="/frontelio/assets/css/mis-estilos.css">
