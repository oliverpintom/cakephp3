<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Book Mark'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookMarks index large-9 medium-8 columns content">
    <h3><?= __('Book Marks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookMarks as $bookMark): ?>
            <tr>
                <td><?= $this->Number->format($bookMark->id) ?></td>
                <td><?= h($bookMark->title) ?></td>
                <td><?= h($bookMark->created) ?></td>
                <td><?= h($bookMark->modified) ?></td>
                <td><?= $this->Number->format($bookMark->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookMark->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookMark->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookMark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookMark->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
