
document.addEventListener("DOMContentLoaded", function(){
var navbar=`        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
<h2 class="m-0 text-primary"><img src="img/cislogo.jpg" alt="CIS Logo" height="75" class="me-3">CIS Innovation Hub</h2>
</a>
<button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
<div class="navbar-nav ms-auto p-4 p-lg-0">
    <a href="index.html" class="nav-item nav-link active">Home</a>
    <a href="about.html" class="nav-item nav-link">About</a>
    <a href="coursedetail.html" class="nav-item nav-link">Courses</a>
 
    <a href="contact.html" class="nav-item nav-link">Contact</a>
</div>

</div>
`
document.getElementById("navbar").innerHTML=navbar });