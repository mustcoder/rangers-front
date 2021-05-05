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
    <h3>ACADEMY LIFE</h3>
    <p>Learn more about life student</p>
    <ul>
        <li><span><a href="#">Accomodation</a></span></li>
        <li><span><a href="#">Student</a></span></li>
        <li><span><a href="#">Activity</a></span></li>
        <li><span><a href="#">Taster days</a></span></li>
        <li><span><a href="#">Visa guide</a></span></li>       
    </ul>
    <h3>Football short courses</h3>            
            <img 
                src="/img/pexels-omar-ramadan-5886522.jpg" 
                class="img-thumbnail border-0"
            alt="foto">              
        <p>
            We offer short courses designed to give players an experience of what
        </p>
        <p class="read">
            <a href="#">Read More</a>
        </p>
        <div class="ara"></div>
    
        <?php dynamic_sidebar('latest-sidebar') ?>

</div>
<!--Sidebar End-->