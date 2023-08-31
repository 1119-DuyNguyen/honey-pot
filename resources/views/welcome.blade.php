<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Using CSS to style an HTML Form</h3>

<div>

    @if(session()->has('status'))
<p >{{ session()->get('status');}}</p>
@endif
{{ session()->get('encrypt') }}

  <form action="{{ route('store') }}" method="POST">
    @csrf
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname{{ $str }}" placeholder="Your name.." >

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname{{ $str }}" placeholder="Your last name.." >

    <input type="hidden" name='honey{{ $str }}' value=''>
    <input type="submit" value="Submit">
  </form>
  <h1> Error:</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

</body>
</html>


