<!DOCTYPE html>
<html>
<body>

<h1>The Window Object</h1>
<h2>The prompt() Method</h2>

<p>Click the button to demonstrate the prompt box.</p>

<button onclick="myFunction()">Try it</button>



<script>
function myFunction() {
  let person = prompt("Please enter your name", "Harry Potter");
  
  if (person != null) {
      <?php 

        ?>
    document.getElementById("demo").innerHTML =
    "Hello " + person + "! How are you today?";
  }
}
</script>

</body>
</html