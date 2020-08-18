<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tickets List') }}</div>

                <div class="card-body">
                   <!-- <a class="btn btn-primary" href="{{ route('tickets.create') }}">Add new ticket</a> -->
                    <br /><br /> 
                    <table class="table">
                    
                        <thead>User in Store</thead>
                    
                        
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Time</th>
                            </tr>
                        
                        <tbody> 
                        @foreach ($users as $user)
                            <tr>
                         
                                <td> $user->name</td>
                                <td>$user->username</td>
                                <td>$user->email</td>
                                <td>$user->created_at</td>
                                <th>Edit</th>
                              
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="6">{{ __('Logut') }}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>