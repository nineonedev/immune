// 유틸: 쿼리스트링 파싱
function getQueryParams() {
  const params = new URLSearchParams(window.location.search);
  return {
    keyword: params.get("keyword")?.trim() ?? "",
    area: params.get("area") ?? "gangseo",
  };
}

// 모든 메뉴 JSON을 fetch하는 함수
async function fetchAllMenus() {
  try {
    const urls = [
      "/json/menu.gangseo.json",
      "/json/menu.gwangmyeon.json",
      "/json/menu.sinchon.json",
      "/json/menu.json",
    ];

    const responses = await Promise.all(urls.map((url) => fetch(url)));
    const jsons = await Promise.all(responses.map((res) => res.json()));

    return {
      gangseo: jsons[0],
      gwangmyeon: jsons[1],
      sinchon: jsons[2],
      common: jsons[3],
    };
  } catch (error) {
    console.error("JSON 로드 에러:", error);
    return {};
  }
}
function collectMatchingLeafPages(node, keyword, parent = null) {
  const matches = [];

  const hasChildren = Array.isArray(node.pages) && node.pages.length > 0;

  if (hasChildren) {
    for (const child of node.pages) {
      matches.push(...collectMatchingLeafPages(child, keyword, node.title));
    }
  } else {
    if (node.title?.toLowerCase().includes(keyword.toLowerCase())) {
      matches.push({
        title: node.title,
        filename: node.filename ?? null,
        board_no: node.board_no ?? null,
        parent: parent,
      });
    }
  }

  return matches;
}

// 검색 로직 실행 함수
async function searchFromMenus() {
  const { keyword, area } = getQueryParams();
  if (!keyword) return;

  const allMenus = await fetchAllMenus();
  const results = [];

  const menusToSearch = [allMenus[area], allMenus.common];

  for (const menu of menusToSearch) {
    if (!menu?.pages) continue;

    for (const section of menu.pages ?? []) {
      const sectionMatches = [];

      for (const page of section.pages ?? []) {
        const matches = collectMatchingLeafPages(page, keyword);
        sectionMatches.push(...matches);
      }

      if (sectionMatches.length > 0) {
        results.push({
          section: section.title,
          dirname: section.dirname,
          items: sectionMatches,
        });
      }
    }
  }

  renderSearchResults(results, keyword, area);
}

function renderSearchResults(data, keyword, area) {
  const resultWrap = document.querySelector(".search-wrap ul.search-list");
  const noResultWrap = document.querySelector(".no-search-result");
  const successWrap = document.querySelector(".search-success");
  const resultInfo = document.querySelector(".search-success p");
  const noResultKeyword = document.querySelector("#no-result-keyword");

  resultWrap.innerHTML = "";

  if (!data || data.length === 0) {
    noResultWrap.style.display = "block";
    successWrap.style.display = "none";
    noResultKeyword.textContent = keyword;
    return;
  }

  successWrap.style.display = "block";
  noResultWrap.style.display = "none";
  resultInfo.innerHTML = `<b class="blue">‘${keyword}’</b>에 대한 검색 결과입니다.`;

  for (const group of data) {
    const li = document.createElement("li");
    li.innerHTML = `<h3 class="no-body-xl fw700">${group.section} (${group.items.length}건)</h3>`;

    const ul = document.createElement("ul");
    ul.className = "dept2";

    for (const item of group.items) {
      let href = "#";
      if (item.filename) {
        href = `/${area}/pages/${group.dirname}/${item.filename}.php`;
      } else if (item.board_no) {
        href = `/pages/board/board.list.php?board_no=${item.board_no}`;
      }

      const liItem = document.createElement("li");

      const isChild = item.parent !== null;

      liItem.innerHTML = `
        <a href="${href}">
          <h4 class="no-body-xl fw400">${
            isChild ? item.parent : item.title
          }</h4>
        </a>
        ${isChild ? `<p class="no-body-lg fw300">${item.title}</p>` : ""}
      `;

      ul.appendChild(liItem);
    }

    li.appendChild(ul);
    resultWrap.appendChild(li);
  }
}

// DOM 로드 시 검색 실행
document.addEventListener("DOMContentLoaded", () => {
  searchFromMenus();
});
