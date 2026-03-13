	<?php
 use Core\Auth;
 use Facades\Storage;
 component("head")
 ?> 
<head>
    <style>
        .btn_add {
        border-radius: 30px;
        width: 155px !important;
        font-weight: 650;
        font-size: 16px;
        background-color: #bfb6b0 !important;
        border: 0px;
        height: 45px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js"></script>
</head>
 <body> 
<?= component("sidebar") ?> 
<?= component("navbar") ?>

<div class="main-content"> 
        <div class="container-xl">
            <?php if(Auth::logged()) :  ?>
                <div class="d-flex justify-content-between col mt-2 mb-2">
                <h4 class="text-black font-bold px-2 py-2"><?=sayHello(Auth::user()['name'])?></h4> 
                </div>
            <?php endif; ?>
                <hr class="mt-2 mb-2">
                <h6 class="mt-2 mb-2">Usuários do Sistema</h6>
            <table class="table table-striped-columns mt-3 mb-2" id="users">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Nível</th>
                        <th scope="col">Status</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            for($i =0; $i < sizeof($users['items']); $i++)
                            {
                                print_r('<tr>
                                            <th scope="row">'.$users['items'][$i]['id'].'</th>
                                            <td>'.$users['items'][$i]['name'].'</td> 
                                            <td>'.$users['items'][$i]['email'].'</td> 
                                            <td>'.($users['items'][$i]['admin']?'admin':'usuario').'</td> 
                                            <td>'.(boolval($users['items'][$i]['active'])?'ativo':'inativo').'</td>
                                            <td>
                                                <a class=""   href="'.url('users/edit/'.base64_encode($users['items'][$i]['id'])).'">Edit</a>
                                                <a class="" href="'.url('users/delete/'.base64_encode($users['items'][$i]['id'])).'">Delete</a>
                                            </td> 
                                            </tr>'
                                        );
                            }    
                        ?>
                </tbody>    
            </table>
            <?=paginate($users)?>
        </div>   
</div>
<?=component('feetlb')?> 