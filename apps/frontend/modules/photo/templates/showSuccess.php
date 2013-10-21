<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $granit_sub_inf->getId() ?></td>
    </tr>
    <tr>
      <th>Inf:</th>
      <td><?php echo $granit_sub_inf->getInfId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $granit_sub_inf->getTitle() ?></td>
    </tr>
    <tr>
      <th>Shortcart:</th>
      <td><?php echo $granit_sub_inf->getShortcart() ?></td>
    </tr>
    <tr>
      <th>Icon:</th>
      <td><?php echo $granit_sub_inf->getIcon() ?></td>
    </tr>
    <tr>
      <th>Content:</th>
      <td><?php echo $granit_sub_inf->getContent() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $granit_sub_inf->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $granit_sub_inf->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sub_inf/edit?id='.$granit_sub_inf->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sub_inf/index') ?>">List</a>
