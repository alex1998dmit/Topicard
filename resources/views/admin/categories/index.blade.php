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
                         <form action="" id="add_category">
                             <label for="category_name">Название категории</label>
                             <input type="text" name="category_name" id="category_name"/>
                             <input type="submit" value="Создать" />
                         </form>
                         <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Подписчиков:</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach ($categories  as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td> {{ $category->name }}</td>
                                        <td> {{ $category->user->count() }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                     </div>
                     </div>
                 </div>
             </div>
             {{-- <div id="ex1" class="modal">
                <form action="">
                    <label for="">Название категории</label>
                    <input type="text" name="category_name" id="categry_name">
                    <input type="submit" value="Изменить" />
                </form>
                <a href="#" rel="modal:close">Close</a>
            </div> --}}
             <script>

            $(document).ready(function(){

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                console.log(CSRF_TOKEN);

                let url_create = "{{ route('categories.store') }}"
                 $("#add_category").on("submit", function(event) {
                    event.preventDefault();
                    let val = $("#category_name").val();
                    console.log(val);
                    $.ajax({
                        url:url_create,
                        type: 'POST',
                        data:{_token: CSRF_TOKEN, name: val },

                        data:{ name: val },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                        },
                     });
                    });
                });
             </script>


    @endsection
