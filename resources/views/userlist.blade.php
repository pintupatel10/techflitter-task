<!DOCTYPE html>
<html>
    <head>
        <title>User List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
        .modal.left .modal-dialog,
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 320px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
                -ms-transform: translate3d(0%, 0, 0);
                 -o-transform: translate3d(0%, 0, 0);
                    transform: translate3d(0%, 0, 0);
        }

        .modal.left .modal-content,
        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }
        
        .modal.left .modal-body,
        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }

        .modal.left.fade .modal-dialog{
            left: -320px;
            -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
               -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
                 -o-transition: opacity 0.3s linear, left 0.3s ease-out;
                    transition: opacity 0.3s linear, left 0.3s ease-out;
        }
        
        .modal.left.fade.in .modal-dialog{
            left: 0;
        }
    </style>
    <body>
        <div class="container">
            <h3 align="center"><b>User List</b></h3>
            {!! Form::open(array('route' => 'user_list', 'class' => 'form', 'method' => 'get')) !!}
                <div class="row">
                    <div class="form-group col-md-2">
                        {!! Form::label('ID') !!}
                        {!! Form::text('id', Request::get('id',null), array(
                                'class'=>'form-control'
                            ))
                        !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('First Name') !!}
                        {!! Form::text('first_name', Request::get('first_name',null), array(
                                'class'=>'form-control'
                            ))
                        !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('Last Name') !!}
                        {!! Form::text('last_name', Request::get('last_name',null), array(
                                'class'=>'form-control'
                            ))
                        !!}
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('Email') !!}
                        {!! Form::text('email', Request::get('email',null), array(
                                'class'=>'form-control'
                            ))
                        !!}
                    </div>
                    <div class="form-group col-md-3" style="margin-top: 22px">
                        {!! Form::submit('Search', array(
                                'class'=>'btn btn-primary no-shadow-button'
                            ))
                        !!}
                        <a href="{{ route('user_list') }}">
                            <button class="btn btn-default no-shadow-button" type="button">Cancel</button>
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$userList->isEmpty())
                            @foreach($userList as $key => $user)
                                <tr class="user_details">
                                    <td class="id"> {{ $user->id }}</td>
                                    <td class="firstName"> {{ $user->first_name }}</td>
                                    <td class="lastName"> {{ $user->last_name }}</td>
                                    <td class="email"> {{ $user->email }}</td>
                                    <td class="phone"> {{ $user->phone }}</td>
                                    <td class="updated_at"> {{ $user->updated_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @php
                    $appendsArray = [
                        'id' => Request::get('id')
                    ];
                @endphp
                {!! $userList->appends($appendsArray)->render() !!}
            </div>
        </div>

        <!-- Modal -->
        <div class="modal left fade" id="userModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">User Display Information</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Id</th>
                                    <td class="userId"></td>
                                </tr>
                                <tr>
                                    <th scope="row">First Name</th>
                                    <td class="firstName"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td class="lastName"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td class="email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td class="phone"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Updated</th>
                                    <td class="updated_at"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

<script type="text/javascript">
    $( "tr.user_details" ).hover(function() {
        $(this).css('cursor','pointer');
    });
    $( "tr.user_details" ).click(function() {
        $('#userModal').modal('show');
        $('#userModal').find('.userId').html($(this).find('td.id').html());
        $('#userModal').find('.firstName').html($(this).find('td.firstName').html());
        $('#userModal').find('.lastName').html($(this).find('td.lastName').html());
        $('#userModal').find('.email').html($(this).find('td.email').html());
        $('#userModal').find('.phone').html($(this).find('td.phone').html());
        $('#userModal').find('.updated_at').html($(this).find('td.updated_at').html());
    });
</script>