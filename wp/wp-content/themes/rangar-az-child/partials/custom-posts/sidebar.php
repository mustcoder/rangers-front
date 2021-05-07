<style>
    /*Sidebar Start*/
    .ara {
        height: 20px;
    }

    .sidebar li {
        font-size: 30px;        
    }

    .sidebar li > span {
        font-size: 14px;
    }

    .read {
        font-size: 14px;
    }

    .read a {
        text-decoration: none;
        color: red; 
    }

    .read a:hover{
        color: rgb(206, 28, 117);
    }

    .sidebar {
        padding-left: 40px;
        border-left: 2px dotted #ddd;
        color: black;
        font-family: 'Times New Roman', Times, serif ;
        font-size: 16px;
        line-height: 26px;
        text-decoration: none; 
    }

    .sidebar ul {
        margin-top: 5px;
    }

    .sidebar ul li a {
        text-decoration: none;
        border-bottom: 2px dotted #ddd;
        display: block;
        color: black;              
    }

    .sidebar ul li  {
        list-style-type: circle;
        color: red;    
    } 

    .sidebar ul li a:hover {
        color: rgb(228, 40, 40);
    }

/*Sidebar End*/
        
</style>


<!--Sidebar start-->
<div class="sidebar">
    <?php dynamic_sidebar('inner-page-sidebar') ?>
</div>
<!--Sidebar End-->