@extends('layouts.cms')

@section('title','Dashboard')

@section('css')
    <style>
        .text-center{
            text-align: center !important;
        }
    </style>
@stop
@section('content')

    <div class="flex my-5">
        <div class="w-1/5"></div>
        <div class="w-3/5">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <table id="articleTable" class="ui celled table">
                    <thead>
                        <tr>
                            <td colspan="2"></td>
                            <th colspan="2" class="text-center"><a href="{{url('article/create')}}"><i class="fa fa-plus-square text-blue"></i></a></th>
                        </tr>
                        <tr>
                            <th width="5px" class="center">#</th>
                            <th><b>Title</b></th>
                            <th width="15px"><b>Update</b></th>
                            <th width="15px"><b>Delete</b></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-1/5"></div>
    </div>

@stop


@section('js')
    <script>
        var $articleTable = $('#articleTable');
        //------------------------------------------------------------------//
        $(function () {
            articleDatatable();
        });
        //------------------------------------------------------------------//
        function editArticle(id) {
            window.location.href = "article/"+id+"/edit";
        }
        //------------------------------------------------------------------//
        function deleteArticle(id){
            if(confirm("Are you sure you want to delete this article?")) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'DELETE',
                    url: 'article/'+id,
                }).done(function(res) {
                    articleDatatable();
                });
            }
        }
        //------------------------------------------------------------------//
        function articleDatatable(){
            if ($.fn.DataTable.isDataTable("#articleTable")) {
                $('#articleTable').DataTable().clear().destroy();
            }
            $articleTable = $("#articleTable").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('getDatatableArticles.data') !!}',
                columnDefs: [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                order: [[ 1, 'asc' ]],
                columns: [
                    {   data: 'id', title:'#' ,name: 'id' , className:'text-center',
                        searchable: false, orderable: false,
                        render: function ( data, type, row, meta ) {
                            return '';
                        }
                    },
                    {data: 'title', title: 'Title' ,name:'title' },

                    {   data: 'id', className: 'text-center',
                        searchable: false, orderable: false,
                        render: function ( data, type, row, meta ) {
                            return '<i class="editArticle fa fa-edit text-orange" data-id="'+data+'" onclick="editArticle('+data+');" style="cursor: pointer"></i>';
                        }
                    },
                    {   data: 'id', className: 'text-center',
                        searchable: false, orderable: false,
                        render: function ( data, type, row, meta ) {
                            return '<i class="deleteArticle fa fa-trash text-red" data-id="'+data+'" onclick="deleteArticle('+data+');" style="cursor: pointer"></i>';
                        }
                    }
                ],
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    var index = iDisplayIndex +1;
                    $('td:eq(0)',nRow).html(index);
                    return nRow;
                },
            });

        }
        //------------------------------------------------------------------//
    </script>
@stop