import React, { useState } from "react";

const Search = ({ search }) => {
  const [searchValue, setSearchValue] = useState("");

  const handleSearchInputChanges = (e) => {
    setSearchValue(e.target.value);
  }

  const resetInputField = () => {
    setSearchValue("")
  }

  const callSearchFunction = (e) => {
    e.preventDefault();  //actionで指定されたURLへのページ遷移＋データ送信を阻害
    search(searchValue); //formに入力された文字を引数にとり、search関数を実行
    resetInputField(); //入力値の値をリセットする関数を呼び出し
  }

  return (
    <form className="search" >
      <input
        value={searchValue}
        onChange={handleSearchInputChanges}
        type="text"
      />
      <input onClick={callSearchFunction} type="submit" value="SEARCH" />
    </form >
  );
}

export default Search;