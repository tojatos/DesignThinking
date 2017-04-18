<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container">
  <p class="jumbotron p_rank">Ranking Ratowników</p>
  <table class='table table-hover'>
    <thead>
      <tr>
        <th>Miejsce</th>
        <th>Nick</th>
        <th>Procent</th>
        <th>Egzamin</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($general_data as $person): ?>
        <tr>
          <td><?= $person->place ?></td>
          <td><?= $person->name ?></td>
          <td><?= $person->exam_result_sum ?></td>
          <?php foreach ($exam_data[$person->name] as $exam_points): ?>
            <td><div class ='exam_ranking_circle'><span class ='exam_ranking_number'><?= ($exam_points->exam_result!=null) ? $exam_points->exam_result : 0 ?></span></div></td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
