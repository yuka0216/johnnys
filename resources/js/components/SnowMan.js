import PreviousMap from 'postcss/lib/previous-map';
import React from 'react';
import { Link } from 'react-router-dom';


function SnowMan(props){
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-12">
                    <center>{props.title}のページ</center>
                    <table>
                        <tr>
                            <td>
                                <Link to="/Abe">
                                    <img class="w-32 h-32 rounded-full" src={"image/abe.jpg"} alt="" />
                                </Link>
                            </td>
                            <td>
                                <Link to="/Sakuma">
                                    <img class="w-32 h-32 rounded-full" src={"image/sakkun.jpg"} alt="" />
                                </Link>
                            </td>
                            <td>
                                <Link to="/Meguro">
                                    <img class="w-32 h-32 rounded-full" src={"image/meme.jpg"} alt="" />
                                </Link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    )
}

export default SnowMan;
