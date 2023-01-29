// var list = document.getElementById("todos-list");
// var addBtn = document.getElementById("todo-add-btn");
// var addInput = document.getElementById("todo-input");
// var option = document.getElementById("importance");

// var todoList = [];

// const getTasks = () => JSON.parse(localStorage.getItem("todoList")) ?? [];

// const setTasks = (todoList) =>

// addInput.addEventListener("keypress", function (event) {
//   if (event.key === "Enter") {
//     createTodo();
//   }
// });

// function createTodo() {

//   var text = addInput.value;
 
//   if (text && importance === "") {
//     return;
//   }

//   todoList.push({
//     text: text,
//     importance: option.value,
//     checked: false,
//   });
//   //   console.log(todoList);

//   renderTodo();
//   addInput.value = "";
// }

// function renderTodo() {
//   //  localStorage.setItem("todoList", JSON.stringify(todoList))
//   //  console.log(todoList)

//   localStorage.setItem("todoList", JSON.stringify(todoList));
//   console.log(todoList);
//   list.innerHTML = "";
//   todoList.forEach((todo, index) => {
//     var li = document.createElement("li");
//     li.classList.add("line");
  
//     var checkbox = document.createElement("input");
//     checkbox.classList.add("checkbox");
//     checkbox.type = "checkbox";
//     checkbox.setAttribute(
//       "onclick",
//       "checkChange(" + index + "," + todo.checked + ");"
//     );
//     checkbox.checked = todo.checked;

//     var paragraph = document.createElement("p");
//     paragraph.classList.add("paragraph");
//     if (todo.checked) {
//       paragraph.classList.add("checked");
//     }
//     paragraph.textContent = todo.text;

//     var remove = document.createElement("span");
//     remove.classList.add("remove");
//     remove.innerHTML = "&cross;";
//     remove.setAttribute("onclick", "removeTodo(" + index + ");");

//     li.appendChild(checkbox);
//     li.appendChild(paragraph);
//     li.appendChild(remove);

//     if (todo.checked) {
//       li.classList.add("bg-checked");
//     }

//     if (todo.checked) {
//       checkbox.classList.add("bg-checkbox");
//     }

//     list.appendChild(li);

    
//   });
// }

// function removeTodo(index) {
//   todoList.splice(index, 1);
//   renderTodo();
// }
// function checkChange(index, status) {
//   if (status == false) {
//     todoList[index].checked = true;
//   } else {
//     todoList[index].checked = false;
//   }
//   // console.log(todoList);

//   renderTodo();
// }

// function saveTodo() {
//   localStorage.setItem("todoList", JSON.stringify(todoList));

//   // console.log(localStorage);
  
//   addBtn.addEventListener("click", createTodo);
// }

// saveTodo();

// // window.onload = function() {
// //     var reloading = sessionStorage.getItem("reloading");
// //     if (reloading) {
// //         sessionStorage.removeItem("reloading");
// //         myFunction();
// //     }
// // }

// // function reloadP() {
// //     sessionStorage.setItem("reloading", "true");
// //     document.location.reload();
// // }
