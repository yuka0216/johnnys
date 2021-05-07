import React, { Component } from "react";

const Form = () => {
  return (
    <div>
      <div className="row">
        <div className="col-md-6 mb-3">
          <label for="firstName">Name</label>
          <input
            type="text"
            className="form-control"
            placeholder="Name"
          />
        </div>
      </div>

      <div className="row">
        <div className="col-md-6 mb-3">
          <label for="address">自己紹介</label>
          <input
            type="text"
            className="form-control"
            placeholder="よろしくお願いします。"
          />
        </div>
      </div>

      <div className="row">
        <div className="col-md-6 mb-3">
          <label for="phone">担当</label>
          <input
            type="text"
            className="form-control"
            placeholder=""
          />
        </div>
      </div>

      <div className="row">
        <div className="col-md-6 mb-3">
          <label for="phone">担当</label>
          <select
            id="inputState"
            className="form-control"
            onChange={event =>
              this.setState({ selectJob: event.target.value })
            }
          >
            <option selected>Choose...</option>
            <option>岩本照</option>
            <option>深澤辰也</option>
            <option>宮舘涼太</option>
            <option>阿部亮平</option>
            <option>佐久間大介</option>
            <option>目黒蓮</option>
            <option>向井康二</option>
            <option>ラウール</option>
            <option>渡辺翔太</option>
          </select>
        </div>
      </div>

      <div className="row">
        <div className="col-md-6 mb-3">
          <button className="btn btn-primary btn-block" type="submit">
            Save
                    </button>
        </div>
      </div>
    </div>
  );
}

export default Form;