<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <?php if(count($events) > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scropt="row"><?php echo e($loop->index + 1); ?></td>
                <td><a href="/events/<?php echo e($event->id); ?>"><?php echo e($event->title); ?></a></td>
                <td><?php echo e(count($event->users)); ?></td>
                <td><a href="/events/edit/<?php echo e($event->id); ?>" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                    <form action="/events/<?php echo e($event->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                    </form>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Você ainda nao possui eventos, <a href="/events/create">Criar evento</a></p>
    <?php endif; ?>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <?php if(count($eventsasparticipant) > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $eventsasparticipant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scropt="row"><?php echo e($loop->index + 1); ?></td>
                <td><a href="/events/<?php echo e($event->id); ?>"><?php echo e($event->title); ?></a></td>
                <td><?php echo e(count($event->users)); ?></td>
                <td>
                    <form action="/events/leave/<?php echo e($event->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>Sair do Evento
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Voce ainda não está participando de nenhum evento, <a href="/">Veja todos os eventos</a></p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jefer\Desktop\projeto com Lavarel 10\projeto\resources\views/events/dashboard.blade.php ENDPATH**/ ?>