@extends('users.layout.app')

@section('content')

<style>
    .account-container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #101519;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
      
    .user-info {
        margin-top: 40px;
        text-align: center;
    }
      
    .user-info img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
      
    .edit-form {
        display: none;
        margin-top: 20px;
    }
      
    .edit-link {
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
      
    .edit-link:hover {
        background-color: #0056b3;
    }
      
    .edit-icon {
        position: absolute;
        top: 230px;
        right: 700px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.3s ease;
    }
      
    .user-info:hover .edit-icon {
        visibility: visible;
        opacity: 1;
    }
</style>

<div style="padding: 0; background: url(https://codewithsadee.github.io/filmlane/assets/images/footer-bg.jpg); background-size: 100%; background-position: center; padding-block: var(--section-padding);">
    <div style="background-color: #5d62673d;" class="account-container">
        <div class="user-info">
            <img src="{{ asset('storage/uploads/users/' . $user->image) }}" alt="Profile Picture">
            <div class="edit-form" id="editForm">
                <form style="background-color:#fff; margin-bottom:20px" action="{{ route('update_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" style="background-color: #fff; color: #333; padding: 10px; border-radius: 5px; border: none;">
                    <button style="background-color: #fff; color: #333; padding: 12px; border-radius: 5px; border: none;" type="submit">Update Image</button>
                </form>                  
            </div>
            <div>
                <div class="edit-icon" onclick="showEditForm()">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>
                <span style="color:#c1c1c1">{{ $user->email }}</span>
            </div>
            <div>
                <span style="color:#c1c1c1">{{ $user->username }}</span>
            </div>
            <div>
                <span style="color:#e6f10e; font-size:17px">{{ $user->status == 1 ? 'Regular account' : 'Premium' }}</span>
            </div>
            <div style="padding:15px 0">
                <a href="{{ route('logout') }}" style="background-color: #007bff; color: #fff; padding: 5px 20px; border-radius: 5px; border: none; margin-top:10px">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    function showEditForm() {
        var editForm = document.getElementById('editForm');
        editForm.style.display = 'block';
    }
</script>

@endsection
