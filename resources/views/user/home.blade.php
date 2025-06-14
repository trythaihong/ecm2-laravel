<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.css')

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
 
   @include('user.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @include('user.banner')
    <!-- Banner Ends Here -->

    @include('user.product')
   @include('user.aboutus')


   @include('user.sex')
    @include('user.contactus')
    
    @include('user.footer')


   @include('user.sc')
   <script src="https://kit.fontawesome.com/0179416403.js" crossorigin="anonymous"></script>
    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
    <script>
      const toggle = document.getElementById('darkModeToggle');
      const body = document.body;
    
      // Check for saved theme in localStorage
      if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
      }
    
      toggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
    
        // Save theme preference
        if (body.classList.contains('dark-mode')) {
          localStorage.setItem('theme', 'dark');
        } else {
          localStorage.setItem('theme', 'light');
        }
      });
    </script>
    


  </body>

</html>
