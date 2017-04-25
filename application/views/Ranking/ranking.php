<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container">
  <p class="p_rank">Ranking Ratowników</p>
  <table class='table table-hover'>
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Nick</th>
        <th>Procent</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($general_data as $person): ?>
        <tr>
          <td><?= $person->place ?></td>
          <td><?= $person->name ?></td>
          <td><?= $person->exam_result_sum/5 ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
