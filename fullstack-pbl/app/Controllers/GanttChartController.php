<?php

namespace App\Controllers;

class GanttChartController extends BaseController
{
    public function ganttchart()
    {
        return view('ganttchart/ganttchart', [
            'title' => 'Gantt Chart'
        ]);
    }

    public function get_data()
    {
        $tasks = [
            [
                'id' => 1,
                'text' => 'Task 1',
                'text' => 'Owner',
                'start_date' => '2023-05-10 08:00:00',
                'duration' => 3,
                'progress' => 0.5
            ],
            [
                'id' => 2,
                'text' => 'Task 2',
                'text' => 'Owner',
                'start_date' => '2023-05-11 08:00:00',
                'duration' => 2,
                'progress' => 0.3
            ],
            [
                'id' => 3,
                'text' => 'Task 3',
                'text' => 'Owner',
                'start_date' => '2023-05-12 08:00:00',
                'duration' => 4,
                'progress' => 0.1
            ]
        ];

        foreach ($tasks as $task) {
            $model = new \App\Models\TaskModel();
            $model->insert($task);
        }

        $xml = new \SimpleXMLElement("<tasks></tasks>");
        foreach ($tasks as $task) {
            $xml_task = $xml->addChild("task");
            foreach ($task as $key => $value) {
                $xml_task->addChild($key, $value);
            }
        }
        return $this->response->setContentType('text/xml')->setBody($xml->asXML());
    }
    public function update_task()
    {
        $request = $this->request->getJSON();
        $id = $request->id;
        $data = [
            'text' => $request->text,
            'start_date' => $request->start_date,
            'duration' => $request->duration,
            'progress' => $request->progress
        ];
        $model = new \App\Models\TaskModel();
        $model->update($id, $data);
        return $this->response->setJSON(['success' => true]);
    }
}
