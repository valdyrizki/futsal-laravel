<div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
<input type="text" name="name" value="{{ old('name') ?? $user->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email</label>
<input type="email" name="email" value="{{ old('email') ?? $user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">No HP</label>
<input type="number" name="nohp" value="{{ old('nohp') ?? $user->nohp}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nohp" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Password</label>
<input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>
</div>
<div class="div form-group">
    <label for="exampleInputEmail1">Level</label>
    <select name="level" class="form-control js-example-basic-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
        <option disabled selected>--- Pilih User ---</option>
        <option {{$user->level == 1 ? "selected" : ""}} value="1">Member</option>
        <option {{$user->level == 2 ? "selected" : "" }} value="2">Admin</option>
        <option {{$user->level == 3 ? "selected" : "" }} value="3">Pemilik</option>
    </select>
</div>


<button type="submit" class="btn btn-primary">{{$submit_button}}</button>
