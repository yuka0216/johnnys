import 'react-tabs/style/react-tabs.css';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import axios from 'axios';
import React, { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Container, Row, Col } from 'react-bootstrap';
import Posts from './Posts';
import Search from './search';
import '../App.css';
import SearchPosts from './SearchPosts';
import Form from './Form';
import ProfileCheck from './ProfileCheck';

const Main = () => {

  const [posts, setPosts] = useState([]);
  const [searchPosts, setSearchPosts] = useState([]);
  const [profile, setProfile] = useState([]);
  const [user, setUser] = useState();
  const url = window.location.pathname;
  const targetUserId = String(url);

  useEffect(() => {
    init()
  }, []);

  const init = async () => {
    try {
      const user = await initUser();
      initPosts(targetUserId, user);
      initProfile(targetUserId);
    } catch (e) {
      console.log("e", e);
    }
  }

  const initPosts = async (targetUserId, user) => {
    try {
      const res = await axios.get('/api' + (targetUserId) + '/' + (user.id))
      console.log("res", res.data);
      setPosts(res.data);
    } catch (e) {
      console.log("e", e);

    }
  }

  const search = async (searchValue) => {
    try {
      const res = await axios.get('/api/search/' + (searchValue))
      setSearchPosts(res.data);
    } catch (e) {
      console.log("e", e);
    }
  }

  const initProfile = async (targetUserId) => {
    try {
      const res = await axios.get('/api/profile' + (targetUserId))
      setProfile(res.data);
    } catch (e) {
      console.log("e", e);
    }
  }

  const initUser = async () => {
    try {
      const res = await axios.get('/api/user')
      const user = res.data;
      setUser(user);
      return user;
    } catch (e) {
      console.log("initUserError", e);
    }
  }

  return (
    <Container>
      <ProfileCheck profile={profile} />
      <Tabs onSelect={() => { initPosts(targetUserId, user) }}>
        <TabList>
          <Tab><img src={'/image/吹き出し.jpg'} width="40px" /></Tab>
          <Tab><img src={'/image/カメラ.jpeg'} width="40px" /></Tab>
          <Tab><img src={'/image/虫眼鏡.jpg'} width="40px" /></Tab>
          <Tab><img src={'/image/マイク.png'} width="40px" /></Tab>
          <Tab><img src={'/image/DM.jpeg'} width="40px" /></Tab>
        </TabList>
        <TabPanel>
          <div>
            <h2>全てのコメントの表示</h2>
            <Posts posts={posts} user={user} viewType="twitter" />
          </div>
        </TabPanel>
        <TabPanel>
          <div>
            <h2>インスタ風画像投稿だけ表示</h2>
            <div className="d-flex flex-wrap">
              <Posts posts={posts} viewType="instagram" />
            </div>
          </div>
        </TabPanel>
        <TabPanel>
          <div>
            <h2>検索ページ</h2>
            <Search search={search} />
            <SearchPosts searchPosts={searchPosts} />
          </div>
        </TabPanel>
        <TabPanel>
          <h2>コンサート参戦履歴</h2>
          <p>追加するボタン</p>
          <p>ブログみたいに投稿一覧表示</p>
        </TabPanel>
        <TabPanel>
          <Form />
        </TabPanel>
      </Tabs>
    </Container >
  )
}

export default Main;
