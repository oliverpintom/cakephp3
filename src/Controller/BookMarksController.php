<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BookMarks Controller
 *
 * @property \App\Model\Table\BookMarksTable $BookMarks
 */
class BookMarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bookMarks = $this->paginate($this->BookMarks);

        $this->set(compact('bookMarks'));
        $this->set('_serialize', ['bookMarks']);
    }

    /**
     * View method
     *
     * @param string|null $id Book Mark id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookMark = $this->BookMarks->get($id, [
            'contain' => []
        ]);

        $this->set('bookMark', $bookMark);
        $this->set('_serialize', ['bookMark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookMark = $this->BookMarks->newEntity();
        if ($this->request->is('post')) {
            $bookMark = $this->BookMarks->patchEntity($bookMark, $this->request->data);
            if ($this->BookMarks->save($bookMark)) {
                $this->Flash->success(__('The book mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The book mark could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bookMark'));
        $this->set('_serialize', ['bookMark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Mark id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookMark = $this->BookMarks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookMark = $this->BookMarks->patchEntity($bookMark, $this->request->data);
            if ($this->BookMarks->save($bookMark)) {
                $this->Flash->success(__('The book mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The book mark could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bookMark'));
        $this->set('_serialize', ['bookMark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Mark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookMark = $this->BookMarks->get($id);
        if ($this->BookMarks->delete($bookMark)) {
            $this->Flash->success(__('The book mark has been deleted.'));
        } else {
            $this->Flash->error(__('The book mark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
