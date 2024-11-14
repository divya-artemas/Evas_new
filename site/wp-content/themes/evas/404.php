<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package test
 */
get_header();
?>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500);
        /* body {
            background-color: #f1efe7;
            color: #000;
            font-size: 100%;
            line-height: 1.5;
            font-family: "Roboto", sans-serif; 
            text-align: center;
        } */
        
        .button {
            font-weight: 300;
            color: #000;
            font-size: 1.2em;
            text-decoration: none;
            border: 1px solid #000;
            padding: .5em;
            border-radius: 3px;
            margin: 25px auto;
            display: block;
            position: relative;
            transition: all .3s linear;
            text-align: center;
            width: 150px;
        }
        
        .button:hover {
            background-color: #000;
            color: #fff;
        }
        
        p {
            font-size: 2em;
            text-align: center;
            font-weight: 100;
        }
        
        h1 {
            /* text-align: center; */
            font-size: 15em;
            font-weight: 100;
        }
    </style>
<div class="feel-free franchise-free">
                  <div class="container">
<h1 style=" text-align: center;">404</h1>
    <p>Oops! Something is wrong.</p> <a class="button" href="<?php echo get_home_url(); ?>"><i class="icon-home"></i> Go back Home</a>
</div>
    </div>

<p>
	&nbsp;
</p>

<?php get_footer();