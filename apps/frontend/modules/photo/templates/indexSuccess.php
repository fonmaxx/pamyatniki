<h1>Granit sub infs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Inf</th>
      <th>Title</th>
      <th>Shortcart</th>
      <th>Icon</th>
      <th>Content</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($granit_sub_infs as $granit_sub_inf): ?>
    <tr>
      <td><a href="<?php echo url_for('sub_inf/show?id='.$granit_sub_inf->getId()) ?>"><?php echo $granit_sub_inf->getId() ?></a></td>
      <td><?php echo $granit_sub_inf->getInfId() ?></td>
      <td><?php echo $granit_sub_inf->getTitle() ?></td>
      <td><?php echo $granit_sub_inf->getShortcart() ?></td>
      <td><?php echo $granit_sub_inf->getIcon() ?></td>
      <td><?php echo $granit_sub_inf->getContent() ?></td>
      <td><?php echo $granit_sub_inf->getCreatedAt() ?></td>
      <td><?php echo $granit_sub_inf->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('sub_inf/new') ?>">New</a>
