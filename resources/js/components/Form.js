import React, { Component } from "react";

const Form = () => (
  <div className="col-md-9 mx-auto">
    <h2>DMの機能追加予定</h2>
    <label htmlFor="message">メッセージ</label>
    <textarea type="text" className="form-control" name="message" rows="4" cols="100"></textarea>
    <button className="btn" style={{ background: '#e5c4bb', align: 'right' }} type="submit">
      send
      </button>
  </div>
);

export default Form;