@extends('admin')

@section('title', 'notifications')


@section('content')
<style>
.select{
border:none;
}
</style>

<div class=' mt-3 px-3  row '> 
    <div class=' col fs-3  text-center'> 
      <h3 class=' col fs-3 fw-bold text-primary text-uppercase'> {{ __('manage notifications') }}</h3>
    </div> 
</div>

<div class='  d-flex justify-content-between mt-3 px-3'> 
    <form class="d-flex">
        <input class="form-control me-2" style='width:16rem' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    <a href="{{ route('admin-notification-form', [ 'language' => Request()->language, 'id' => Auth()->user()->id ]) }}" 
    class='btn fw-bold btn-primary ms-auto' > <i class="fa-solid fa-circle-plus"></i> {{ __('Notify') }} </a> 
</div>
<div class='d-flex justify-content-end mt-3 pe-3'> 
    <table class="table">
        <thead class='table-secondary'>
            <tr>
            <form action="#" method="GET">
            <th scope="col">#</th>
            <th scope="col">user id</th>
            <th scope="col">subject</th>
            <th scope="col">content</th>
            
            <th scope="col" class='text-capitalize'>view</th>
            <th scope="col" class='text-capitalize'>mark as read</th>
            <th scope="col" class='text-capitalize'>reply</th>
             <th scope="col" class='text-capitalize'>delete</th>
            </form>
            </tr>
            
        </thead>
        <tbody>

            @foreach (Auth::user()->notifications as $notification)

                <tr>

                <td class='fs-6'>{{ $loop->index +1 }} </td>
                <td class='fs-6'>{{ $notification->notifiable_id }}</td>
                <td class='fs-6'>{{ $notification->data['subject'] }}</td>
                <td class='fs-6'>{{ $notification->data['message'] }}</td>
                <td><a href='#'><i class="fa-solid fa-eye text-info"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-check text-success"></i></a></td>
                <td><a href='#'><i class="fa-solid fa-reply text-primary"></i></a></td>
                  <td><a href='#'><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            
                </tr>
                
            @endforeach

        </tbody>
     </table>
</div>

<nav class='mt-4' aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
@endsection


@section('js')
<script>

</script>
@endsection