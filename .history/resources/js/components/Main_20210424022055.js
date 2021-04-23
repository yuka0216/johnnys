import { Router, Route, Link } from 'react-router';
import ReactDOM from 'react-dom';
import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import Lightbox from "lightbox-react";
import LikeButton from './LikeButton';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Container, Row, Col } from 'react-bootstrap';
import TwitterViewImage from './TwitterViewImage';
import InstaViewImage from './InstaViewImage';
import ImagePathsMap from './ImagePathsMap';

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

    return (
        <Container>
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
                                    <div className="card">
                                        <div className="card-body">
                                            <p>{post.comment}</p>
                                            <ImagePathsMap imagePaths={post.imagePaths} viewImage={TwitterViewImage} />

                                            {/* {
                                                post.imagePaths.map((imagePath) => {
                                                    return (
                                                        <TwitterViewImage imagePath={imagePath} />
                                                    )
                                                })
                                            } */}
                                            <p>{post.created_at}</p>
                                            <LikeButton />
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
                        <div className="d-flex flex-md-wrap col-md-12">
                            {
                                posts.map((post) => {
                                    return (
                                        <div className="col-md-3">
                                            <ImagePathsMap imagePaths={post.imagePaths} viewImage={InstaViewImage} />
                                            {/* {
                                                post.imagePaths.map((imagePath) => {
                                                    return (
                                                        <InstaViewImage imagePath={imagePath} />
                                                    )
                                                })
                                            } */}
                                        </div>
                                    )
                                })
                            }
                        </div>
                    </div>
                </TabPanel>
            </Tabs>
        </Container >
    )
}


export default Main;

