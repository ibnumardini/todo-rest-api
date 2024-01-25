const todoResultContainer = document.querySelector("#todoParent");

async function fetchDataTodo() {
    try {
        const url = "http://127.0.0.1:8000/api/todos";

        const response = await fetch(url);

        const data = await response.json();

        const dataList = data
            .map(({ todo, done }) => `<li class="py-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/40" alt="Avatar">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">${todo}</p>
                                            <p class="text-sm text-gray-500">${done ? 'done' : 'undone'}</p>
                                        </div>
                                    </div>
                                </li>`);

        todoResultContainer.innerHTML = dataList.join("");
    } catch (error) {
        console.error("Error fetching data:", error);
        todoResultContainer.innerHTML = "<p>Error fetching data</p>";
    }
};

fetchDataTodo();
