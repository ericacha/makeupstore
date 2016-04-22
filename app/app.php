<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/makeup.php";

    session_start();
    if (empty($_SESSION['makeups'])) {
        // kill all session vars in 'makeups'
        $_SESSION['makeups'] = [];

        require_once __DIR__."/../src/makeupData.php";
    }



    $app = new Silex\Application();
    // Registerung twig in Silex
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
       return $app['twig']->render('makeupList.twig', array('makeups' => Makeup::getMakeups()));
    });


    $app->get("/makeupInput", function() use ($app) {
        return $app['twig']->render('makeupInput.twig');
    });

    //saving and posting new entries of added makeup products
    $app->post("/makeupInputed", function() use ($app) {
        $newMakeup = new Makeup($_POST['name'], $_POST['type'], $_POST['cover_product'],$_POST['brand'], $_POST['price']);
        $newMakeup->save();
        return $app['twig']->render('makeupInputed.twig', array('product' => $newMakeup));;
    });

    //go to search page and will look for "type" of makeup as assigned
    $app->get("/searchbytype", function() use ($app) {
        return $app['twig']->render('search.twig');
    });

    //page to getting "type" matching the types inputed
    $app->get("/result", function() use ($app) {
        // create new array to store matches
        $makeup_results = [];
        // create search term to include wildcards
        $term = "*" . strtolower($_GET['type']) . "*";
        foreach ($_SESSION['makeups'] as $makeup) {
            // push matches to $makeup_results
            if (fnmatch($term, strtolower($makeup->getType()))) {
                array_push($makeup_results, $makeup);
            }
        }
        // pass matches and render result.twig
        return $app['twig']->render('result.twig', array('products' => $makeup_results));
    });

    return $app;
?>
