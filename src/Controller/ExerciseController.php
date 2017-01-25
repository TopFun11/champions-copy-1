<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exercise Controller
 *
 * @property \App\Model\Table\ExerciseTable $Exercise
 */
class ExerciseController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sections']
        ];
        $exercise = $this->paginate($this->Exercise);

        $this->set(compact('exercise'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercise = $this->Exercise->get($id, [
            'contain' => ['Sections', 'Recordset', 'Question']
        ]);

        $this->set('exercise', $exercise);
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exercise = $this->Exercise->newEntity();
        if ($this->request->is('post')) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->data);
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $sections = $this->Exercise->Sections->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'sections'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercise = $this->Exercise->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->data);
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $sections = $this->Exercise->Sections->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'sections'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercise->get($id);
        if ($this->Exercise->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}