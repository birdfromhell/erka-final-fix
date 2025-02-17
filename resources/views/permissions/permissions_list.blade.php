@extends('layouts.master')
@section('main-content')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">

@endsection

<div class="breadcrumb">
  <h1>Izin</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_Permissions_list">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="text-end mb-3">

          <a class="btn btn-outline-primary btn-md m-1" href="{{route('permissions.create')}}"><i
              class="i-Add me-2 font-weight-bold"></i> {{ __('translate.Create') }}</a>
        </div>
        <div class="table-responsive">
          <table id="permissions_table" class="display table">
            <thead>
              <tr>
                <th>Nama Roles</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)
              <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                @can('group_permission')
                @if($role->id === 1)
                <td>Tidak dapat mengubah izin default</td>
                @else
                <td>
                  <a href="/user-management/permissions/{{$role->id}}/edit" class="cursor-pointer text-success ul-link-action"
                    data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="i-Edit"></i>
                  </a>
                  <a @click="Remove_role( {{ $role->id}})" class="cursor-pointer text-danger me-1 ul-link-action" data-toggle="tooltip"
                    data-placement="top" title="Delete">
                    <i class="i-Close-Window"></i>
                  </a>
                </td>
                @endif
                @endcan
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

@section('page-js')

<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>


<script>
  var app = new Vue({
        el: '#section_Permissions_list',
        data: {
            SubmitProcessing:false,
            errors:[],
        },
       
        methods: {

             //--------------------------------- Remove Role ---------------------------\\
             Remove_role(id) {

                swal({
                    title: 'Anda Yakin',
                    text: 'Anda TIdak Akan Bisa Mengembalikan Tindakan ini!!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Ya Hapus',
                    cancelButtonText: 'Tidak batalkan',
                    confirmButtonClass: 'btn btn-primary me-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                        axios
                            .delete("/user-management/permissions/" + id)
                            .then(() => {
                                window.location.href = '/user-management/permissions'; 
                                toastr.success('Berhasil Dihapus');

                            })
                            .catch(() => {
                                toastr.error('Terjadi Kesalahan');
                            });
                    });
                },





           
        },
        //-----------------------------Autoload function-------------------
        created() {
        }

    })

</script>

<script type="text/javascript">
  $(function () {
      "use strict";

        $('#permissions_table').DataTable( {
            "processing": true, // for show progress bar
            "responsive": true,
            dom: "<'row'<'col-sm-12 col-md-7'lB><'col-sm-12 col-md-5 p-0'f>>rtip",
            oLanguage: {
                    sEmptyTable: "{{ __('datatable.sEmptyTable') }}",
                    sInfo: "{{ __('datatable.sInfo') }}",
                    sInfoEmpty: "{{ __('datatable.sInfoEmpty') }}",
                    sInfoFiltered: "{{ __('datatable.sInfoFiltered') }}",
                    sInfoThousands: "{{ __('datatable.sInfoThousands') }}",
                    sLengthMenu: "_MENU_", 
                    sLoadingRecords: "{{ __('datatable.sLoadingRecords') }}",
                    sProcessing: "{{ __('datatable.sProcessing') }}",
                    sSearch: "",
                    sSearchPlaceholder: "{{ __('datatable.sSearchPlaceholder') }}",
                    oPaginate: {
                        sFirst: "{{ __('datatable.oPaginate.sFirst') }}",
                        sLast: "{{ __('datatable.oPaginate.sLast') }}",
                        sNext: "{{ __('datatable.oPaginate.sNext') }}",
                        sPrevious: "{{ __('datatable.oPaginate.sPrevious') }}",
                    },
                    oAria: {
                        sSortAscending: "{{ __('datatable.oAria.sSortAscending') }}",
                        sSortDescending: "{{ __('datatable.oAria.sSortDescending') }}",
                    }
                },
                buttons: [
                    {
                        extend: 'collection',
                        text: "{{ __('translate.EXPORT') }}",
                        buttons: [
                          {
                            extend: 'print',
                            text: 'print',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                          },
                          {
                            extend: 'pdf',
                            text: 'pdf',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                          },
                          {
                            extend: 'excel',
                            text: 'excel',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                          },
                          {
                            extend: 'csv',
                            text: 'csv',
                            exportOptions: {
                                columns: ':visible:Not(.not_show)',
                                rows: ':visible'
                            },
                          },
                        ]
                      }]
        });

    });
</script>
@endsection