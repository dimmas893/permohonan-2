@extends('layouts.admin.template_admin')
@section('content')
<div class="card">
    <div class="card-header">Pilih Layanan</div>
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="my-2">
                <label for="id_layanan">Id Layanan</label>
                <select style="width:100%;" class="form-control js-example-basic-single" name="id_layanan">
                    <option class="form-control">----pilihh----</option>
                    @foreach ($layanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
    <div class="card">
        <div class="card-header">{{ $permohonans->id_layanan }}</div>
    </div>
    <div class="row my-5">
        <div class="col-lg-12">
          <div class="card shadow">
            <div class="card-body" id="perysaratan_data">
              <h1 class="text-center text-secondary my-5">Loading...</h1>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('js')
      <script>
    $(function() {

      // edit employee ajax request
    //   $(document).on('click', '.editIcon', function(e) {
    //     e.preventDefault();
    //     let id = $(this).attr('id');
    //     $.ajax({
    //       url: '{{ route('pemohonan-edit') }}',
    //       method: 'get',
    //       data: {
    //         id: id,
    //         _token: '{{ csrf_token() }}'
    //       },
    //       success: function(response) {
    //         $("#nama_persyaratan").val(response.nama_persyaratan);
    //         $("#entry_data").val(response.entry_data);
    //         $("#status").val(response.status);
    //         $("#image").html(
    //             `<img src="/storage/images/${response.upload_data}" width="100" class="img-fluid img-thumbnail">`);
    //         $("#emp_image").val(response.upload_data);
    //         $("#emp_id").val(response.id);
    //       }
    //     });
    //   });

      // update employee ajax request
    //   $("#edit_TU_form").submit(function(e) {
    //     e.preventDefault();
    //     const fd = new FormData(this);
    //     $("#edit_TU_btn").text('Updating...');
    //     $.ajax({
    //       url: '{{ route('pemohonan-update') }}',
    //       method: 'post',
    //       data: fd,
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       dataType: 'json',
    //       success: function(response) {
    //         if (response.status == 200) {
    //           Swal.fire(
    //             'Updated!',
    //             'Persyaratan Updated Successfully!',
    //             'success'
    //           )
    //           perysaratan_data();
    //         }
    //         $("#edit_TU_btn").text('Update');
    //         $("#edit_TU_form")[0].reset();
    //         $("#editTUModal").modal('hide');
    //       }
    //     });
    //   });

      // delete employee ajax request
    //   $(document).on('click', '.deleteIcon', function(e) {
    //     e.preventDefault();
    //     let id = $(this).attr('id');
    //     let csrf = '{{ csrf_token() }}';
    //     Swal.fire({
    //       title: 'Are you sure?',
    //       text: "You won't be able to revert this!",
    //       icon: 'warning',
    //       showCancelButton: true,
    //       confirmButtonColor: '#3085d6',
    //       cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //       if (result.isConfirmed) {
    //         $.ajax({
    //           url: '{{ route('pemohonan-delete') }}',
    //           method: 'delete',
    //           data: {
    //             id: id,
    //             _token: csrf
    //           },
    //           success: function(response) {
    //             console.log(response);
    //             Swal.fire(
    //               'Deleted!',
    //               'Your file has been deleted.',
    //               'success'
    //             )
    //             perysaratan_data();
    //           }
    //         });
    //       }
    //     })
    //   });
      // fetch all employees ajax request
      perysaratan_data();

      function perysaratan_data() {
        $.ajax({
          url: '{{ route('permohonan_details-all', $permohonans->id_layanan) }}',
          method: 'get',
          success: function(response) {
            $("#perysaratan_data").html(response);
            $("table").DataTable({
            });
          }
        });
      }
    });
  </script>
@endsection
