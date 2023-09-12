<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cập nhật danh mục '. $Category->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ Session::get('message') }}</li>             
                    </ul>
                </div>
            @endif
            <a href="{{route('admin.category')}}" style="background: blue; color:white" class="btn outline-dark my-2">
                Trở về 
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật danh mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.category.update', [$Category->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group my-3">
                                <label for="code">Mã danh mục</label>
                                <input type="text" class="form-control bg-neutral-400" id="code" readonly name="code" placeholder="Nhập mã danh mục" value="{{$Category->code}}">
                            </div>
                            <div class="form-group my-2">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" value="{{ $Category->name }}">
                            </div>
                            <div class="form-group my-2">
                                <label for="name">Icon danh mục</label>
                                <span style="display: flex;
                                flex-direction: row;
                                flex-wrap: nowrap;
                                align-items: center;">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Nhập tên danh mục" value="{{ $Category->icon }}">                     
                                    <span style="font-size: 32px;  margin-left:5%" id="iconTemp"> {!! $Category->icon !!}</span>
                                </span>
                            </div>                
                            <div class="form-group my-2">
                                <label for="name">Danh mục con</label>
                                @if(isset($CategoryDetail))
                                    @foreach ($CategoryDetail as $key => $item)
                                        <input type='text' class='input-field form-control my-3' name="childMenuUpdate_{{$key+1}}" value="{{$item->name}}">
                                        <input hidden type='text' class='input-field form-control my-3' name="childMenuUpdateId_{{$key+1}}" value="{{$item->id}}">
                                    @endforeach
                                @endif
                                <span id="Addchild" class="btn btn-warning">Thêm menu con</span>
                            </div>
                        </div>
                      
                        <button type="submit" class="btn btn-primary text-gray-900">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#icon").change(function(){
            const icon = $('#icon').val()
            $("#iconTemp").html(icon)
        });
        var inputCount = 1;
        $('#Addchild').click(function(){
            var newInput = $("<input type='text' class='input-field form-control  my-3'>");
            var uniqueName = "childMenu_" + inputCount;
            newInput.attr('name', uniqueName);
            inputCount++;
            $(this).before(newInput);
        })
    </script>

</x-app-layout>