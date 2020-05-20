
<h3>Get started by entering your goals!</h3>
<form action="./handlers/handle_get_started.php" method="POST">
  <p>Starting Weight</p>
  <input type="text" name="startWeight" placeholder="..170.20">
  <p>Goal Weight</p>
  <input type="text" name="goalWeight" placeholder="...160.00">
  <p>Goal Date</p>
  <input type="date" name="goalDate" />
  <p>Gender</p>
  <select name="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
  </select>  
  <input type="submit" value="Submit">

</form>