import React, {useState, useEffect, Fragment} from 'react';
import axios from "axios";
import PostDetails from "../PostDetails";

const Posts = () => {
	console.log('test');
	const [posts, setPosts] = useState([]);
	useEffect(() => {
		const loadPosts = async () => {
			const response = await axios.get('/api/post');
			console.log(response.data);
			setPosts(response.data);
		}
		try {
			loadPosts();
		} catch (e) {
			console.error(e);
		}
	}, []);
	console.log('posts', posts);
	return (
		<Fragment>
			{posts.length > 0 && posts.map((item: any) => {
				return (<PostDetails post={item} />)
			})}
		</Fragment>
	);
};

export default Posts;
