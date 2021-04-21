import { Router, Route, Link } from 'react-router';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import Lightbox from "lightbox-react";


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

    // user_id 1だけを取り出す
    // const filter_posts_user_id = posts.filter(posts => {
    //     return posts.user_id == "1";
    // })
    // console.log("filter_user_id", filter_posts_user_id);

    const style = {
        width: "100px",
    };


    return (

        <div className="container">
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
                                            {post.image_path &&
                                                (<img src={'/images/' + post.image_path} style={style} />)
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
                                        <a href={'/images/' + image.image_path} data-lightbox="group"><img src={'/images/' + image.image_path} width="200" /></a>
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

