@extends('layouts.admin')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header" >

               <h5 class="modal-title" id="deleteModalLabel" >تأكيد الحذف</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <form id="editForm">
                   <input type="hidden" id="editId" name="Id" />
                   <div class="form-group">
                       <h5 class="modal-title" id="deleteModalLabel"> هل تريد حذف هذا السجل ؟!</h5>

                   </div>
               </form>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
               <button type="button" class="btn btn-primary" id="saveChanges" onclick="ConfirmDelete_Categories()" data-bs-dismiss="modal"> حذف</button>
           </div>
       </div>
   </div>
</div>
   <div class="container">
      <div class="row mt-5">
         <div class="col d-flex justify-content-center">
            <div class="card">
                <div class="card-header" style="background-color: rgb(109, 24, 200);">
                   <h3 class="text-white">إضافة فئة </h3>
                </div>
                <div class="card-body">
                 <form action="{{route('categories.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                          <label class="form-label">اسم الفئة</label>
                          <input type="text" class="form-control" name="categ_name" >
                          @error('categ_name')
                           <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">وصف الفئة</label>
                            <input type="text" class="form-control" name="categ_descreption" >
                            @error('categ_descreption')
                            <small class="text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="col">
                          <label class="form-label">الايقونة </label>
                          <input type="text" class="form-control" name="icon" >
                          @error('icon')
                          <small class="text-danger">{{ $message }}</small>
                         @enderror
                      </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
         </div>
      </div>

      <div class="row mt-5">
         <div class="col">
            <div class="card">
               <div class="card-header" style="background-color: rgb(149, 43, 198);">
                 <h3 class="text-white">الفئات</h3>
               </div>
               <div class="card-body">
                 <table class="table">
                   <thead>
                     <tr >
                        <td class="text-center" >رقم الفئة</td>
                        <td class="text-center">اسم الفئة</td>
                        <td class="text-center"> وصف الفئة </td>
                        <td  class="text-center" colspan="2">إجراء</td>
                     </tr>
                   </thead>
                  
                   <tbody>
                     @foreach($categoreis as $item)
                      
                         <tr>
                           <td  class="text-center">{{$item->id}}</td>
                           <td  class="text-center">{{$item->name}}</td>
                           <td  class="text-center">{{$item->description}}</td>
                           <td  class="text-center"><a href="{{route('categories.Edit',['id'=>$item->id])}}"><i class="bi bi-pencil-fill text-success"></i></a></td>
                           <td  class="text-center"><button class="btn btn-link"  onclick="delete_categories({{$item->id}})"><i class="bi bi-trash text-danger"></i></button></td></td>
                         </tr>

                     @endforeach
                   </tbody>
                 </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection