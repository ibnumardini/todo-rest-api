const provinceResultContainer = document.querySelector("#provinceParent");

async function fetchDataProvince() {
    try {
        const url = "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json";

        const response = await fetch(url);

        const data = await response.json();

        const dataList = data
            .map(({ name }) => `<li class="py-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/40" alt="Avatar">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">${name}</p>
                                            <p class="text-sm text-gray-500">Deskripsi item 1.</p>
                                        </div>
                                    </div>
                                </li>`);

        provinceResultContainer.innerHTML = dataList.join("");
    } catch (error) {
        console.error("Error fetching data:", error);
        provinceResultContainer.innerHTML = "<p>Error fetching data</p>";
    }
};

fetchDataProvince();
