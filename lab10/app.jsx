// импорт модуль реакт и функц юзстэйт, уможливя додане стану до компонентув
import React, { useState } from 'react';
import './App.css';

//фкция апп рендеруе интерфейс ужитковика, сэт служы до актуализации тего стану
function App() {
  const [tasks, setTasks] = useState([]); //декларуе стан таскс ктуры хранит листэ задань
  const [inputText, setInputText] = useState(''); //декларуе стан инпуттекст ктуры пшеховуе впровадз текст
  const [hideCompleted, setHideCompleted] = useState(false); //декларуе стан ктуры окрэсла чы заданя укрытэ


//функция ктура выволана при змяне завартости пола текстовего 
  const handleInputChange = (event) => {
    setInputText(event.target.value);
  };

  //функция ктура выволана по кликненьцю додаваня заданя 
  const handleAddTask = () => { //трим удалить бялэ знаки
    if (inputText.trim() !== '') { //если поле текстовэ не пустэ, то додае
      setTasks([...tasks, { id: tasks.length + 1, text: inputText, completed: false }]);//исп фкция сеттаск актуал стан таскс, нов заданя додаванэ до клона листы таскс
      setInputText('');
    }
  };

  //фция выволана по кликненьцю чекбокса заданя, перекл статус на укончоно
  const handleToggleTask = (taskId) => { //фкция принимает taskid это id зад котор хотим окончить
    setTasks(tasks.map(task => //исп фнкцию сеттаскс которая актуал стан таскс при помощ методы мап
      task.id === taskId ? { ...task, completed: !task.completed } : task
    ));
  };

  //функция выволана по кликненьчу чекбокса укрый укончонэ, пшэлонча стан мендзы тру фолс
  const handleHideCompleted = () => {
    setHideCompleted(!hideCompleted);
  };

  return (
    <div className="App">
      <div className="frame">
        <h3>Welcome to my To Do list</h3>
        
		<label>
          <input
            type="checkbox"
            checked={hideCompleted}
            onChange={handleHideCompleted}
          />
          Hide Completed
        </label>
        
		<hr/>

     //рендер листы задань   
		<ul>
          {tasks.length > 0 ? (
            tasks.map(task => (
              !hideCompleted || !task.completed ? (
                <li key={task.id}>
                  <input
                    type="checkbox"
                    checked={task.completed}
                    onChange={() => handleToggleTask(task.id)}
                  />
                  <span style={{ textDecoration: task.completed ? 'line-through' : 'none' }}>{task.text}</span>
                </li>
              ) : null
            ))
          ) : (
            <li>Nothing to do</li>
          )}
        </ul>

        <hr />
        
        <input
          type="text"
          placeholder="Enter task..."
          value={inputText}
          onChange={handleInputChange}
        />
        <button onClick={handleAddTask}>Add Task</button>
      
      </div>
    </div>
  );
}

export default App;
