@include ('layouts.topmenu')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info ">show profile</div>
                    <div class="card-body text-center text-secondary">
                        <h3><?php echo $user->name ?></h3>
                        <h4><?php echo $user->email; ?></h4>
                        <h4><?php echo $user->phone; ?></h4>
                        <h5><?php echo $user->created_at; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@include ('layouts.footer')