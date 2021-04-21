import { Router, Route, Link } from 'react-router';
import ReactDOM from 'react-dom';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import Lightbox from "lightbox-react";
import LikeButton from './LikeButton';

console.log('like', like);
console.log('main')



const Main = () => {

    const [posts, setPosts] = useState([]);

    useEffect(
        () => {
            axios
                .get('/api/mypage')
                .then((res) => {
                    console.log('res', res)
                    setPosts(res.data);
                })
                .catch((e) => {
                    console.log("e", e);
                })
        },
        []
    );
    const [images, setImages] = useState([]);

    useEffect(
        () => {
            axios
                .get('/api/imagepost')
                .then((imagePost) => {
                    console.log('imagePost', imagePost)
                    setImages(imagePost.data);
                })
                .catch((e) => {
                    console.log("e", e);
                })
        },
        []
    );

    const style = {
        width: "100px",
    };

    return (

        <div className="container">
            <LikeButton />
            <Tabs>
                <TabList>
                    <Tab>Tweet</Tab>
                    <Tab>Instagram</Tab>
                </TabList>
                <TabPanel>
                    <div>
                        <h2>全てのコメントの表示</h2>
                        {
                            posts.map((post) => {
                                return (
                                    <div class="card">
                                        <div class="card-body">
                                            <p>{post.comment}</p>
                                            {post.images &&
                                                images.map((image) => {
                                                    return (
                                                        <div>
                                                            <img src={'/images/' + image} style={style} />
                                                        </div>
                                                    )
                                                })
                                            }
                                            <p>{post.created_at}</p>
                                        </div>
                                    </div>
                                )
                            })
                        }
                    </div>
                </TabPanel>
                <TabPanel>
                    <div>

                        <h2>インスタ風画像投稿だけ表示</h2>
                        <div class="container" style={{ display: "flex", flexWrap: "wrap", width: "100%" }} >
                            {
                                images.map((image) => {
                                    return (
                                        <a href={'/images/' + image} data-lightbox="group"><img src={'/images/' + image} width="200" /></a>
                                    )
                                })
                            }
                        </div>
                    </div>
                </TabPanel>
            </Tabs>
        </div>
    )
}

export default Main;

