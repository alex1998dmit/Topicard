@extends('layouts.app')
    @section('content')

            <div class="row">
                @include('admin.includes.menu')
                 <div class="col-md-8">
                     <div class="card">
                     <div class="card-header">
                         Категории
                     </div>
                     <div class="card-body">
                         <form action="" id="add_category" name="add_category" enctype="multipart/form-data">
                             <label for="category_name">Название категории</label>
                             <input type="hidden" name="_token" value="{{ csrf_token()}}">
                             <input type="text" name="category_name" id="category_name"/>
                             <input type="file" name="category_avatar" id="category_avatar"/>
                             <input type="submit" value="Создать" />
                         </form>
                         <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Аватар:</th>
                                    <th scope="col">Подписчиков:</th>
                                  </tr>
                                </thead>
                                <tbody class="categories_list" id="categories_list">

                                  @foreach ($categories  as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td> {{ $category->name }}</td>
                                        <td><img class="profile__avatar rounded" src="{{ asset('uploads/categories_avatars/'. $category->avatar)}}" name="avatar_img" class="avatar_img" alt="avatar" style="widht:30px; height:30px" /></td>
                                             <td> {{ $category->user->count() }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                     </div>
                     </div>
                 </div>
             </div>
             <script>

            $(document).ready(function(){

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                let token = '{{ Session::token() }}';

                let url_store = "{{ route('categories.store') }} ";

                 $("#add_category").on("submit", function(event) {
                    event.preventDefault();
                    let name = $("#category_name").val();
                    var image = $('#category_avatar')[0].files[0];
                    let form = new FormData();
                    form.append('name', name);
                    form.append('image', image);
                    $.ajax({
                        url:url_store,
                        type: 'POST',
                        data: form,
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            let img_url = "{{ asset('uploads/categories_avatars/') }}" + "/" + data.avatar;
                            if(data){
                                $('#categories_list').append(`
                                <tr>
                                    <td>${data.id}</td>
                                    <td>${data.name}</td>
                                    <td><img class="profile__avatar rounded" src="${img_url}" name="avatar_img" class="avatar_img" alt="avatar" style="widht:30px; height:30px" /></td>
                                </tr>
                            `);
                            }

                        },
                    });
                });

            });
        </script>


    @endsection
