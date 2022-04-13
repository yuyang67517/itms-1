

<form action="addUser" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Name"> <br><br>
    <input type="text" name="email" placeholder="Enter Email"> <br><br>
    <button type="submit">Add User</button>
</form>
