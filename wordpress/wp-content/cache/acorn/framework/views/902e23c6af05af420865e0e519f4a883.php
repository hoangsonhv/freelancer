<div class="livescore-wrapper">

  <div class="ls-tabs">
    <button class="active">Tất cả</button>
    <button class="live">🔴 Trực tiếp (36)</button>
    <button>Đã kết thúc</button>
    <button>Lịch thi đấu</button>
  </div>

  <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competition_id => $matches): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $comp = $matches->first()->competition; ?>

    <div class="ls-competition">
      <img src="<?php echo e($comp->logo); ?>" class="comp-logo">
      <span class="comp-name"><?php echo e($comp->name); ?></span>
    </div>

    <?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="ls-row">
        <div class="ls-time">
          <?php echo e(date('H:i', $match->match_time)); ?>

          <div class="ls-live-status <?php echo e($match->status_id == 2 || $match->status_id == 4 ? 'live' : ''); ?>">
            <?php if($match->status_id == 2): ?>
              <?php echo e($match->minute ?? '1H'); ?>

            <?php elseif($match->status_id == 3): ?>
              Nghỉ giữa hiệp
            <?php elseif($match->status_id == 4): ?>
              <?php echo e($match->minute ?? '2H'); ?>

            <?php elseif($match->status_id == 8): ?>
              FT
            <?php else: ?>
              -
            <?php endif; ?>
          </div>
        </div>

        <div class="ls-team home">
          <img src="<?php echo e($match->homeTeam->logo); ?>" class="team-logo">
          <span><?php echo e($match->homeTeam->name); ?></span>
        </div>

        <div class="ls-score">
          <span class="score-home"><?php echo e($match->home_scores[0]); ?></span>
          <span>-</span>
          <span class="score-away"><?php echo e($match->away_scores[0]); ?></span>
        </div>

        <div class="ls-team away">
          <img src="<?php echo e($match->awayTeam->logo); ?>" class="team-logo">
          <span><?php echo e($match->awayTeam->name); ?></span>
        </div>

        <div class="ls-last">
          HT <?php echo e($match->home_scores[1]); ?>-<?php echo e($match->away_scores[1]); ?>

        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/html/wp-content/themes/my-theme/resources/views/components/live-scores.blade.php ENDPATH**/ ?>